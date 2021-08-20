<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20210820083217 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Movie source Media entity';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('ALTER TABLE app_movie ADD source_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE app_movie ADD CONSTRAINT FK_CB8D7FA2953C1C61 FOREIGN KEY (source_id) REFERENCES media__media (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_CB8D7FA2953C1C61 ON app_movie (source_id)');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('ALTER TABLE app_movie DROP FOREIGN KEY FK_CB8D7FA2953C1C61');
        $this->addSql('DROP INDEX UNIQ_CB8D7FA2953C1C61 ON app_movie');
        $this->addSql('ALTER TABLE app_movie DROP source_id');
    }
}
