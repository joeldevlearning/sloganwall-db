<?php

namespace App\Models\Repo;

use App\Models\SloganResponse\SloganResponseInterface;
use App\Models\SloganResponse\SloganResponseFactoryInterface;

class SloganRepo extends RepoAbstract
{
    private $db;

    public function oneItemById(int $id): SloganResponseInterface
    {
	    $results = $this->db->select('SELECT * FROM slogans WHERE slogan_id = :id', [ 'id' => $id ]);
	    return $this->wrap($results);
    }

    public function oneItemByZh(string $zh): SloganResponseInterface
    {
        $results = $this->db->select('SELECT * FROM slogans WHERE slogans.zh = :zh', [ 'zh' => $zh ]);
	    return $this->wrap($results);
    }

    public function random(): SloganResponseInterface
    {
        $results = $this->db->select('SELECT * FROM slogans ORDER BY RANDOM() LIMIT 1');
        return $this->wrap($results);
    }

    public function anyItemByZi(string $zi): SloganResponseInterface
    {
        $zi = '%' . trim($zi, '"') . '%'; //format for postgreSQL

        $results = $this->db->select('SELECT * FROM slogans WHERE zh LIKE :text', [ 'text' => $zi ]);
	    return $this->wrap($results);
    }

    public function anyItemByFirstZi(string $zi): SloganResponseInterface
    {
        $zi = mb_substr($zi, 0, 1, 'utf-8'); //grab first character
        $zi = '%' . trim($zi, '"') . '%';

	    $results = $this->db->select('SELECT * FROM slogans WHERE zh LIKE :text', [ 'text' => $zi ]);
	    return $this->wrap($results);
    }

    public function anyItemByTag(string $tag): SloganResponseInterface
    {
        $tag = '%' . trim($tag, '"') . '%';

        $results = $this->db->select('
		SELECT slogans.slogan_id, tags.label FROM slogans_to_tags
        JOIN slogans ON slogans_to_tags.slogan_fk = slogans.slogan_id
        FULL JOIN tags ON slogans_to_tags.tag_fk = tags.tag_id
        WHERE tags.label ILIKE :text', [ 'text' => $tag ]);

	    return $this->wrap($results);
    }

    public function anyItemByTranslation(string $translation): SloganResponseInterface
    {
        $translation = '%' . trim($translation, '"') . '%';

        $results = $this->db->select('SELECT slogan_fk AS slogan_id,content FROM translations WHERE translations.content ILIKE :text',
            [ 'text' => $translation ]);

	    return $this->wrap($results);
    }

    public function anyItemByNote(string $note): SloganResponseInterface
    {
        $note = '%' . trim($note, '"') . '%';

        $results = $this->db->select('SELECT slogan_fk AS slogan_id,content FROM notes WHERE notes.content ILIKE :text',
            [ 'text' => $note ]);
	    return $this->wrap($results);
    }

    public function allSlogans(): SloganResponseInterface
    {
        $results = $this->db->select('SELECT * FROM all_slogans_plus_related');
	    return $this->wrap($results);
    }

    public function allZh(): SloganResponseInterface
    {
        $results = $this->db->select('SELECT slogans.slogan_id, slogans.zh FROM slogans');
	    return $this->wrap($results);
    }

    public function allTranslations(): SloganResponseInterface
    {
        $results = $this->db->select('SELECT slogan_fk AS slogan_id,content FROM translations');
	    return $this->wrap($results);
    }

    public function allNotes(): SloganResponseInterface
    {
        $results = $this->db->select('SELECT slogan_fk AS slogan_id,content FROM notes');
	    return $this->wrap($results);
    }

    public function allTags(): SloganResponseInterface
    {
        $results = $this->db->select('
				SELECT slogans.slogan_id, tags.label FROM slogans_to_tags
				JOIN slogans ON slogans_to_tags.slogan_fk = slogans.slogan_id
				FULL JOIN tags ON slogans_to_tags.tag_fk = tags.tag_id
				');
	    return $this->wrap($results);
    }

    public function __construct(SloganResponseFactoryInterface $factory)
    {
	    parent::__construct($factory);
        $this->db = app('db');
    }
}
