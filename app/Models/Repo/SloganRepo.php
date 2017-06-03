<?php

namespace App\Models\Repo;

class SloganRepo
{
    private $db;

    public function oneItemById(int $id): array
    {
        return $this->db->select('SELECT * FROM slogans WHERE slogan_id = :id', [ 'id' => $id ]);
    }

    public function oneItemByZh(string $zh): array
    {
        return $this->db->select('SELECT * FROM slogans WHERE slogans.zh = :zh', [ 'zh' => $zh ]);
    }

    public function random(): array
    {
        return $this->db->select('SELECT * FROM slogans ORDER BY RANDOM() LIMIT 1');
    }

    public function anyItemByZi(string $zi): array
    {
        $zi = '%' . trim($zi, '"') . '%';

        return $this->db->select('SELECT * FROM slogans WHERE zh LIKE :text', [ 'text' => $zi ]);
    }

    public function anyItemByFirstZi(string $zi): array
    {
        $zi = mb_substr($zi, 0, 1, 'utf-8'); //grab first character
        $zi = '%' . trim($zi, '"') . '%';

        return $this->db->select('SELECT * FROM slogans WHERE zh LIKE :text', [ 'text' => $zi ]);
    }

    public function anyItemByTag(string $tag): array
    {
        $tag = '%' . trim($tag, '"') . '%';

        return $this->db->select('
		SELECT slogans.slogan_id, tags.label FROM slogans_to_tags
        JOIN slogans ON slogans_to_tags.slogan_fk = slogans.slogan_id
        FULL JOIN tags ON slogans_to_tags.tag_fk = tags.tag_id
        WHERE tags.label ILIKE :text', [ 'text' => $tag ]);
    }

    public function anyItemByTranslation(string $translation): array
    {
        $translation = '%' . trim($translation, '"') . '%';

        return $this->db->select('SELECT slogan_fk AS slogan_id,content FROM translations WHERE translations.content ILIKE :text',
            [ 'text' => $translation ]);
    }

    public function anyItemByNote(string $note): array
    {
        $note = '%' . trim($note, '"') . '%';

        return $this->db->select('SELECT slogan_fk AS slogan_id,content FROM notes WHERE notes.content ILIKE :text',
            [ 'text' => $note ]);
    }

    public function allSlogans(): array
    {
        return $this->db->select('SELECT * FROM all_slogans_plus_related');
    }

    public function allZh(): array
    {
        return $this->db->select('SELECT slogans.slogan_id, slogans.zh FROM slogans');
    }

    public function allTranslations(): array
    {
        return $this->db->select('SELECT slogan_fk AS slogan_id,content FROM translations');
    }

    public function allNotes(): array
    {
        return $this->db->select('SELECT slogan_fk AS slogan_id,content FROM notes');
    }

    public function allTags(): array
    {
        return $this->db->select('
				SELECT slogans.slogan_id, tags.label FROM slogans_to_tags
				JOIN slogans ON slogans_to_tags.slogan_fk = slogans.slogan_id
				FULL JOIN tags ON slogans_to_tags.tag_fk = tags.tag_id
				');
    }

    public function __construct()
    {
        $this->db = app('db');
    }
}
