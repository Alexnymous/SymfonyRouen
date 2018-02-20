<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180220161311 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE article ADD categorie_id VARCHAR(50) NOT NULL, DROP auteur, CHANGE categorie auteur_id INT NOT NULL');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_CD8737FABCF5E72D FOREIGN KEY (categorie_id) REFERENCES Categorie (id)');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_CD8737FA60BB6FE6 FOREIGN KEY (auteur_id) REFERENCES Auteur (id)');
        $this->addSql('CREATE INDEX IDX_CD8737FABCF5E72D ON article (categorie_id)');
        $this->addSql('CREATE INDEX IDX_CD8737FA60BB6FE6 ON article (auteur_id)');
        $this->addSql('ALTER TABLE categorie CHANGE id id VARCHAR(50) NOT NULL');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE Article DROP FOREIGN KEY FK_CD8737FABCF5E72D');
        $this->addSql('ALTER TABLE Article DROP FOREIGN KEY FK_CD8737FA60BB6FE6');
        $this->addSql('DROP INDEX IDX_CD8737FABCF5E72D ON Article');
        $this->addSql('DROP INDEX IDX_CD8737FA60BB6FE6 ON Article');
        $this->addSql('ALTER TABLE Article ADD auteur LONGTEXT NOT NULL COLLATE utf8_unicode_ci COMMENT \'(DC2Type:array)\', DROP categorie_id, CHANGE auteur_id categorie INT NOT NULL');
        $this->addSql('ALTER TABLE Categorie CHANGE id id VARCHAR(50) NOT NULL COLLATE utf8_unicode_ci');
    }
}
