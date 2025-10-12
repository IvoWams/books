<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20251012205808 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE party (id CHAR(36) NOT NULL COMMENT \'(DC2Type:guid)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE party_bank_account (party_id CHAR(36) NOT NULL COMMENT \'(DC2Type:guid)\', bank_account_id VARCHAR(255) NOT NULL, INDEX IDX_CC62B8D9213C1059 (party_id), INDEX IDX_CC62B8D912CB990C (bank_account_id), PRIMARY KEY(party_id, bank_account_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE party_bank_account ADD CONSTRAINT FK_CC62B8D9213C1059 FOREIGN KEY (party_id) REFERENCES party (id)');
        $this->addSql('ALTER TABLE party_bank_account ADD CONSTRAINT FK_CC62B8D912CB990C FOREIGN KEY (bank_account_id) REFERENCES bankaccount (iban)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE party_bank_account DROP FOREIGN KEY FK_CC62B8D9213C1059');
        $this->addSql('ALTER TABLE party_bank_account DROP FOREIGN KEY FK_CC62B8D912CB990C');
        $this->addSql('DROP TABLE party');
        $this->addSql('DROP TABLE party_bank_account');
    }
}
