<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210207160539 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE project ADD author_id INT NOT NULL');
        $this->addSql('ALTER TABLE project ADD CONSTRAINT FK_2FB3D0EEF675F31B FOREIGN KEY (author_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_2FB3D0EEF675F31B ON project (author_id)');
        $this->addSql('ALTER TABLE training ADD author_id INT NOT NULL');
        $this->addSql('ALTER TABLE training ADD CONSTRAINT FK_D5128A8FF675F31B FOREIGN KEY (author_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_D5128A8FF675F31B ON training (author_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE project DROP FOREIGN KEY FK_2FB3D0EEF675F31B');
        $this->addSql('DROP INDEX IDX_2FB3D0EEF675F31B ON project');
        $this->addSql('ALTER TABLE project DROP author_id');
        $this->addSql('ALTER TABLE training DROP FOREIGN KEY FK_D5128A8FF675F31B');
        $this->addSql('DROP INDEX IDX_D5128A8FF675F31B ON training');
        $this->addSql('ALTER TABLE training DROP author_id');
    }
}
