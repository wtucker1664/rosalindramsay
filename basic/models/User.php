<?php

namespace app\models;

use Yii;
use yii\base\Event;

class User extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
public static function tableName() { return 'clients'; }

public function init(){
	
}
   /**
 * @inheritdoc
 */
public static function findIdentity($id) {

    $user = self::find()
            ->where([
                "a__clientID_t" => $id
            ])
            ->one();
    if (!count($user)) {
        return null;
    }
    return new static($user);
}

/**
 * @inheritdoc
 */
public static function findIdentityByAccessToken($token, $userType = null) {

    $user = self::find()
            ->where(["access_token" => $token])
            ->one();
    if (!count($user)) {
        return null;
    }
    return new static($user);
}

/**
 * Finds user by username
 *
 * @param  string      $username
 * @return static|null
 */
public static function findByUsername($username) {
    $user = self::find()
            ->where([
                "username" => $username
            ])
            ->one();
    if (!count($user)) {
        return null;
    }
    
    return new static($user);
}

/**
 * @inheritdoc
 */
public function getId() {
    return $this->a__clientID_t;
}

/**
 * @inheritdoc
 */
public function getAuthKey() {
    return $this->access_token;
}

/**
 * @inheritdoc
 */
public function validateAuthKey($authKey) {
    return $this->access_token === $authKey;
}

/**
 * Validates password
 *
 * @param  string  $password password to validate
 * @return boolean if password provided is valid for current user
 */
public function validatePassword($password) {
    return $this->password === $password;
}

}
