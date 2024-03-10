<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20240310060752 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '0001. Create coupons and products tables';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('CREATE SEQUENCE coupons_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE products_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE coupons (id INT NOT NULL, code VARCHAR(7) NOT NULL, amount DOUBLE PRECISION NOT NULL, used BOOLEAN DEFAULT false NOT NULL, coupon_type VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE products (id INT NOT NULL, title VARCHAR(255) NOT NULL, price DOUBLE PRECISION NOT NULL, PRIMARY KEY(id))');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('DROP SEQUENCE coupons_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE products_id_seq CASCADE');
        $this->addSql('DROP TABLE coupons');
        $this->addSql('DROP TABLE products');
    }
}
