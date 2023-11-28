<?php

use common\models\db\User;
use yii\db\Migration;
use yii\db\StaleObjectException;

/**
 * Class m231128_224248_add_admin_user
 */
class m231128_224248_add_admin_user extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $user = new User();
        $user->username = 'admin';
        $user->email = 'admin@example.com';
        $user->setPassword('admin');
        $user->status = $user::STATUS_ACTIVE;
        $user->generateAuthKey();
        $user->save(false);
    }

    /**
     * {@inheritdoc}
     * @throws Throwable
     * @throws StaleObjectException
     */
    public function safeDown()
    {
        User::findByUsername('admin')?->delete();
    }

}
