<?php

namespace app\modules\adminable\widgets\social;

use yii\bootstrap\Html;
use dektrium\user\widgets\Connect;

/**
 * Class SocialConnect
 * @package app\modules\adminable\widgets\social
 */
class SocialConnect extends Connect
{
    /**
     * @var array
     */
    private $iconClasses = [
        'facebook' => 'fa-facebook',
        'github' => 'fa-github',
        'vkontakte' => 'fa-vk',
    ];

    /**
     * @inheritdoc
     */
    protected function renderMainContent()
    {
        echo Html::beginTag('div', ['class' => 'social-auth-links text-center']);
        foreach ($this->getClients() as $externalService) {
            $text = Html::tag('i', '', ['class' => 'auth-icon fa ' .
                (!empty($this->iconClasses[$externalService->getName()]) ? $this->iconClasses[$externalService->getName()] : ''),
            ]);
            $text .= $externalService->getTitle();

            $this->clientLink($externalService, $text, ['class' => 'btn btn-block btn-social btn-flat btn-' . $externalService->getName()]);
        }
        echo Html::endTag('div');
    }

    /**
     * @inheritdoc
     */
    public function init()
    {
        if ($this->getClients()) {
            SocialConnectAssets::register($this->view);
        }
    }
}
