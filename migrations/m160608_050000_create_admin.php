<?php
use yii\db\Migration;
use echoooxx\admin\components\Configs;
class m160608_050000_create_admin extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        $adminTable = Configs::instance()->adminTable;
        // Check if the table exists
        if ($this->db->schema->getTableSchema($adminTable, true) === null) {
            $this->createTable($adminTable, [
                'id' => $this->primaryKey(),
                'username' => $this->string(32)->notNull(),
                'auth_key' => $this->string(32)->notNull(),
                'password_hash' => $this->string()->notNull(),
                'password_reset_token' => $this->string(),
                'email' => $this->string()->notNull(),
                'mobile' => $this->string()->notNull(),
                'status' => $this->smallInteger()->notNull()->defaultValue(10),
                'created_at' => $this->integer()->notNull(),
                'updated_at' => $this->integer()->notNull(),
            ], $tableOptions);

            $this->batchInsert($adminTable, [
                'id',
                'username',
                'auth_key',
                'password_hash',
                'password_reset_token',
                'email',
                'mobile',
                'status',
                'created_at',
                'updated_at'
            ], [
                [
                    null,
                    'admin',
                    '0U47lgN7kNAGzVp0v2sMeJiZqEUglR4H',
                    '$2y$13$Jb3so2GuTZxAfwqUrZxKq.9rx0kyhwP86H/0bR1FgF5A31jBbociu',
                    NULL,
                    'zhanglimcgrady@sina.com',
                    '13641508131',
                    10,
                    time(),
                    time()
                ],
            ]);
        }
    }
    public function down()
    {
        $userTable = Configs::instance()->adminTable;
        if ($this->db->schema->getTableSchema($userTable, true) !== null) {
            $this->dropTable($userTable);
        }
    }
}
