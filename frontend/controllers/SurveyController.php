<?php

namespace frontend\controllers;

use frontend\models\SurveyForm;
use Yii;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\Response;

class SurveyController extends Controller
{
    public function behaviors(): array
    {
        return [
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'index' => ['GET', 'POST'],
                ],
            ],
        ];
    }

    public function actionIndex(): string|Response
    {
        $model = new SurveyForm();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->validate()) {

                if ($model->sendForm()) {
                    Yii::$app->session->setFlash('success', 'Ваша анкета успешно отправлена.');
                    return $this->goHome();
                } else {
                    Yii::$app->session->setFlash('error', 'Ошибка отправки анкекы. Анкета не отправлена');
                }

            }
        }

        return $this->render('index', ['model' => $model]);
    }
}