<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20210815130514 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Add poster media relationship for movie';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('ALTER TABLE app_movie ADD poster_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE app_movie ADD CONSTRAINT FK_CB8D7FA25BB66C05 FOREIGN KEY (poster_id) REFERENCES media__media (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_CB8D7FA25BB66C05 ON app_movie (poster_id)');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('ALTER TABLE app_movie DROP FOREIGN KEY FK_CB8D7FA25BB66C05');
        $this->addSql('DROP INDEX UNIQ_CB8D7FA25BB66C05 ON app_movie');
        $this->addSql('ALTER TABLE app_movie DROP poster_id');
    }
}
