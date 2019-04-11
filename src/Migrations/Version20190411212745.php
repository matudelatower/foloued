<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190411212745 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE tipo_documento (id INT AUTO_INCREMENT NOT NULL, creado_por_id INT DEFAULT NULL, actualizado_por_id INT DEFAULT NULL, descripcion VARCHAR(255) NOT NULL, activo TINYINT(1) DEFAULT NULL, fecha_creacion DATETIME NOT NULL, fecha_actualizacion DATETIME NOT NULL, INDEX IDX_54DF9189FE35D8C4 (creado_por_id), INDEX IDX_54DF9189F6167A1C (actualizado_por_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE fos_user (id INT AUTO_INCREMENT NOT NULL, persona_id INT DEFAULT NULL, username VARCHAR(180) NOT NULL, username_canonical VARCHAR(180) NOT NULL, email VARCHAR(180) NOT NULL, email_canonical VARCHAR(180) NOT NULL, enabled TINYINT(1) NOT NULL, salt VARCHAR(255) DEFAULT NULL, password VARCHAR(255) NOT NULL, last_login DATETIME DEFAULT NULL, confirmation_token VARCHAR(180) DEFAULT NULL, password_requested_at DATETIME DEFAULT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', UNIQUE INDEX UNIQ_957A647992FC23A8 (username_canonical), UNIQUE INDEX UNIQ_957A6479A0D96FBF (email_canonical), UNIQUE INDEX UNIQ_957A6479C05FB297 (confirmation_token), UNIQUE INDEX UNIQ_957A6479F5F88DB9 (persona_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE etiqueta (id INT AUTO_INCREMENT NOT NULL, padre_id INT DEFAULT NULL, creado_por_id INT DEFAULT NULL, actualizado_por_id INT DEFAULT NULL, descripcion VARCHAR(255) DEFAULT NULL, nombre VARCHAR(255) NOT NULL, activo TINYINT(1) DEFAULT NULL, fecha_creacion DATETIME NOT NULL, fecha_actualizacion DATETIME NOT NULL, INDEX IDX_6D5CA63A613CEC58 (padre_id), INDEX IDX_6D5CA63AFE35D8C4 (creado_por_id), INDEX IDX_6D5CA63AF6167A1C (actualizado_por_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE persona (id INT AUTO_INCREMENT NOT NULL, tipo_documento_id INT NOT NULL, creado_por_id INT DEFAULT NULL, actualizado_por_id INT DEFAULT NULL, nombre VARCHAR(255) NOT NULL, apellido VARCHAR(255) NOT NULL, dni VARCHAR(255) NOT NULL, fecha_nacimiento DATE NOT NULL, activo TINYINT(1) DEFAULT NULL, fecha_creacion DATETIME NOT NULL, fecha_actualizacion DATETIME NOT NULL, INDEX IDX_51E5B69BF6939175 (tipo_documento_id), INDEX IDX_51E5B69BFE35D8C4 (creado_por_id), INDEX IDX_51E5B69BF6167A1C (actualizado_por_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE etiqueta_persona (persona_id INT NOT NULL, etiqueta_id INT NOT NULL, INDEX IDX_F358577F5F88DB9 (persona_id), INDEX IDX_F358577D53DA3AB (etiqueta_id), PRIMARY KEY(persona_id, etiqueta_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE persona_contacto (id INT AUTO_INCREMENT NOT NULL, persona_id INT NOT NULL, contacto_id INT NOT NULL, creado_por_id INT DEFAULT NULL, actualizado_por_id INT DEFAULT NULL, activo TINYINT(1) DEFAULT NULL, fecha_creacion DATETIME NOT NULL, fecha_actualizacion DATETIME NOT NULL, INDEX IDX_C7925D7DF5F88DB9 (persona_id), INDEX IDX_C7925D7D6B505CA9 (contacto_id), INDEX IDX_C7925D7DFE35D8C4 (creado_por_id), INDEX IDX_C7925D7DF6167A1C (actualizado_por_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE contacto (id INT AUTO_INCREMENT NOT NULL, creado_por_id INT DEFAULT NULL, actualizado_por_id INT DEFAULT NULL, calle VARCHAR(255) NOT NULL, numero_puerta VARCHAR(255) NOT NULL, telefono VARCHAR(255) DEFAULT NULL, celular VARCHAR(255) NOT NULL, mail VARCHAR(255) NOT NULL, mail_contacto VARCHAR(255) NOT NULL, instagram VARCHAR(255) DEFAULT NULL, twitter VARCHAR(255) DEFAULT NULL, facebook VARCHAR(255) DEFAULT NULL, youtube VARCHAR(255) DEFAULT NULL, activo TINYINT(1) DEFAULT NULL, fecha_creacion DATETIME NOT NULL, fecha_actualizacion DATETIME NOT NULL, INDEX IDX_2741493CFE35D8C4 (creado_por_id), INDEX IDX_2741493CF6167A1C (actualizado_por_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE tipo_documento ADD CONSTRAINT FK_54DF9189FE35D8C4 FOREIGN KEY (creado_por_id) REFERENCES fos_user (id)');
        $this->addSql('ALTER TABLE tipo_documento ADD CONSTRAINT FK_54DF9189F6167A1C FOREIGN KEY (actualizado_por_id) REFERENCES fos_user (id)');
        $this->addSql('ALTER TABLE fos_user ADD CONSTRAINT FK_957A6479F5F88DB9 FOREIGN KEY (persona_id) REFERENCES persona (id)');
        $this->addSql('ALTER TABLE etiqueta ADD CONSTRAINT FK_6D5CA63A613CEC58 FOREIGN KEY (padre_id) REFERENCES etiqueta (id)');
        $this->addSql('ALTER TABLE etiqueta ADD CONSTRAINT FK_6D5CA63AFE35D8C4 FOREIGN KEY (creado_por_id) REFERENCES fos_user (id)');
        $this->addSql('ALTER TABLE etiqueta ADD CONSTRAINT FK_6D5CA63AF6167A1C FOREIGN KEY (actualizado_por_id) REFERENCES fos_user (id)');
        $this->addSql('ALTER TABLE persona ADD CONSTRAINT FK_51E5B69BF6939175 FOREIGN KEY (tipo_documento_id) REFERENCES tipo_documento (id)');
        $this->addSql('ALTER TABLE persona ADD CONSTRAINT FK_51E5B69BFE35D8C4 FOREIGN KEY (creado_por_id) REFERENCES fos_user (id)');
        $this->addSql('ALTER TABLE persona ADD CONSTRAINT FK_51E5B69BF6167A1C FOREIGN KEY (actualizado_por_id) REFERENCES fos_user (id)');
        $this->addSql('ALTER TABLE etiqueta_persona ADD CONSTRAINT FK_F358577F5F88DB9 FOREIGN KEY (persona_id) REFERENCES persona (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE etiqueta_persona ADD CONSTRAINT FK_F358577D53DA3AB FOREIGN KEY (etiqueta_id) REFERENCES etiqueta (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE persona_contacto ADD CONSTRAINT FK_C7925D7DF5F88DB9 FOREIGN KEY (persona_id) REFERENCES persona (id)');
        $this->addSql('ALTER TABLE persona_contacto ADD CONSTRAINT FK_C7925D7D6B505CA9 FOREIGN KEY (contacto_id) REFERENCES contacto (id)');
        $this->addSql('ALTER TABLE persona_contacto ADD CONSTRAINT FK_C7925D7DFE35D8C4 FOREIGN KEY (creado_por_id) REFERENCES fos_user (id)');
        $this->addSql('ALTER TABLE persona_contacto ADD CONSTRAINT FK_C7925D7DF6167A1C FOREIGN KEY (actualizado_por_id) REFERENCES fos_user (id)');
        $this->addSql('ALTER TABLE contacto ADD CONSTRAINT FK_2741493CFE35D8C4 FOREIGN KEY (creado_por_id) REFERENCES fos_user (id)');
        $this->addSql('ALTER TABLE contacto ADD CONSTRAINT FK_2741493CF6167A1C FOREIGN KEY (actualizado_por_id) REFERENCES fos_user (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE persona DROP FOREIGN KEY FK_51E5B69BF6939175');
        $this->addSql('ALTER TABLE tipo_documento DROP FOREIGN KEY FK_54DF9189FE35D8C4');
        $this->addSql('ALTER TABLE tipo_documento DROP FOREIGN KEY FK_54DF9189F6167A1C');
        $this->addSql('ALTER TABLE etiqueta DROP FOREIGN KEY FK_6D5CA63AFE35D8C4');
        $this->addSql('ALTER TABLE etiqueta DROP FOREIGN KEY FK_6D5CA63AF6167A1C');
        $this->addSql('ALTER TABLE persona DROP FOREIGN KEY FK_51E5B69BFE35D8C4');
        $this->addSql('ALTER TABLE persona DROP FOREIGN KEY FK_51E5B69BF6167A1C');
        $this->addSql('ALTER TABLE persona_contacto DROP FOREIGN KEY FK_C7925D7DFE35D8C4');
        $this->addSql('ALTER TABLE persona_contacto DROP FOREIGN KEY FK_C7925D7DF6167A1C');
        $this->addSql('ALTER TABLE contacto DROP FOREIGN KEY FK_2741493CFE35D8C4');
        $this->addSql('ALTER TABLE contacto DROP FOREIGN KEY FK_2741493CF6167A1C');
        $this->addSql('ALTER TABLE etiqueta DROP FOREIGN KEY FK_6D5CA63A613CEC58');
        $this->addSql('ALTER TABLE etiqueta_persona DROP FOREIGN KEY FK_F358577D53DA3AB');
        $this->addSql('ALTER TABLE fos_user DROP FOREIGN KEY FK_957A6479F5F88DB9');
        $this->addSql('ALTER TABLE etiqueta_persona DROP FOREIGN KEY FK_F358577F5F88DB9');
        $this->addSql('ALTER TABLE persona_contacto DROP FOREIGN KEY FK_C7925D7DF5F88DB9');
        $this->addSql('ALTER TABLE persona_contacto DROP FOREIGN KEY FK_C7925D7D6B505CA9');
        $this->addSql('DROP TABLE tipo_documento');
        $this->addSql('DROP TABLE fos_user');
        $this->addSql('DROP TABLE etiqueta');
        $this->addSql('DROP TABLE persona');
        $this->addSql('DROP TABLE etiqueta_persona');
        $this->addSql('DROP TABLE persona_contacto');
        $this->addSql('DROP TABLE contacto');
    }
}
