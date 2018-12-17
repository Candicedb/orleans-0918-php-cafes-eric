<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181217145855 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE family_tea (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE tea ADD family_tea_id INT NOT NULL');
        $this->addSql('ALTER TABLE tea ADD CONSTRAINT FK_8E86D7B2A309CD18 FOREIGN KEY (family_tea_id) REFERENCES family_tea (id)');
        $this->addSql('CREATE INDEX IDX_8E86D7B2A309CD18 ON tea (family_tea_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE tea DROP FOREIGN KEY FK_8E86D7B2A309CD18');
        $this->addSql('DROP TABLE family_tea');
        $this->addSql('DROP INDEX IDX_8E86D7B2A309CD18 ON tea');
        $this->addSql('ALTER TABLE tea DROP family_tea_id');
    }
}
