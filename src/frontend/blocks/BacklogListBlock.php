<?php

namespace malankateam\luya\trello\frontend\blocks;

use Yii;
use luya\cms\base\PhpBlock;
use luya\cms\frontend\blockgroups\ProjectGroup;
use luya\cms\helpers\BlockHelper;
use Trello\Client;
use luya\admin\models\Logger;

/**
 * Backlog List Block.
 *
 * File has been created with `block/create` command.
 * @author Robert Kuznetsov <robert@malanka.pro>
 */
class BacklogListBlock extends PhpBlock
{
    /**
     * @var string The module where this block belongs to in order to find the view files.
     */
    public $module = 'trellofrontend';

    /**
     * @var boolean Choose whether block is a layout/container/segmnet/section block or not, Container elements will be optically displayed
     * in a different way for a better user experience. Container block will not display isDirty colorizing.
     */
    public $isContainer = true;

    /**
     * @inheritDoc
     */
    public function blockGroup()
    {
        return ProjectGroup::class;
    }

    /**
     * @inheritDoc
     */
    public function name()
    {
        return 'Trello Backlog List Block';
    }
    
    /**
     * @inheritDoc
     */
    public function icon()
    {
        return 'extension'; // see the list of icons on: https://design.google.com/icons/
    }
 
    /**
     * @inheritDoc
     */
    public function config()
    {
        return [
            'vars' => [
                ['var' => 'tokenOrLogin', 'label' => Yii::t('trellofrontend', 'token_or_login'), 'type' => self::TYPE_TEXT],
                ['var' => 'password', 'label' => Yii::t('trellofrontend', 'password'), 'type' => self::TYPE_TEXT],
            ],
        ];
    }

    /**
     * @inheritDoc
     */
    public function extraVars()
    {
        return [
            'boards' => $this->getAllBoards(),
            'firstMember' => $this->getFirstMember(),
        ];
    }

    /**
     * Get client API after authentificaiton
     * @return Client
     */
    private function getClient()
    {
        if (empty($this->getVarValue('tokenOrLogin')) || empty($this->getVarValue('password'))) {
            Logger::warning('Do not set Trello API credentials for Trello extension');
            return false;
        }

        try {
            $client = new Client();

            $client->authenticate(
                $this->getVarValue('tokenOrLogin'),
                $this->getVarValue('password'),
                Client::AUTH_URL_CLIENT_ID
            );

            return $client;
        } catch(\Exception $exception) {
            Logger::warning('Cannot create client object for work Trello API');
            return false;
        }
    }

    private function getAllBoards()
    {
        $client = $this->getClient();
        if ($client) {
            $boards = $client->api('member')->boards()->all();
        } else {
            $boards = [];
        }
        return $boards;
    }

    /**
     * Get information about first user from first board
     * @return array
     */
    private function getFirstMember()
    {
        $boards = $this->getAllBoards();
        if (! empty($boards)) {
            $board = $boards[0];
            $members = $board['memberships'];
            $member = $members[0];

            $client = $this->getClient();
            $memberInfo = $client->api('member')->show($member['idMember']);
            return $memberInfo;
        } else {
            return [];
        }
    }

    /**
     * {@inheritDoc} 
     *
    */
    public function admin()
    {
        return '<h5 class="mb-3">Backlog List Block</h5>' .
            '<table class="table table-bordered">' .
                '<h4>Trello information</h4>' .
            '</table>';
    }
}