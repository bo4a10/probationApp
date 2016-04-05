<?php

namespace app\commands;

use Yii,
    yii\console\Controller,
    app\rbac\UserGroupRule;

class RbacController extends Controller
{
    public function actionInit()
    {
        $authManager = \Yii::$app->authManager;

        $user  = $authManager->createRole('user');
        $admin = $authManager->createRole('admin');

        $userGroupRule = new UserGroupRule();
        $authManager->add($userGroupRule);

        $user->ruleName  = $userGroupRule->name;
        $admin->ruleName = $userGroupRule->name;

        $authManager->add($user);
        $authManager->add($admin);

    }


}