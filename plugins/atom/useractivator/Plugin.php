<?php namespace Atom\Useractivator;

use Backend;
use System\Classes\PluginBase;
use Atom\UserActivator\Classes\Extend\UserExtend;

/**
 * useractivator Plugin Information File
 */
class Plugin extends PluginBase
{
    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name'        => 'useractivator',
            'description' => 'No description provided yet...',
            'author'      => 'atom',
            'icon'        => 'icon-leaf'
        ];
    }

    /**
     * Register method, called when the plugin is first registered.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Boot method, called right before the request route.
     *
     * @return array
     */
    public function boot()
    {
        UserExtend::afterUserRegister_generateActivationCode();
        UserExtend::makeActivationCodeVisible();
    }

    /**
     * Registers any front-end components implemented in this plugin.
     *
     * @return array
     */
    public function registerComponents()
    {
        return []; // Remove this line to activate

        return [
            'Atom\Useractivator\Components\MyComponent' => 'myComponent',
        ];
    }

    /**
     * Registers any back-end permissions used by this plugin.
     *
     * @return array
     */
    public function registerPermissions()
    {
        return []; // Remove this line to activate

        return [
            'atom.useractivator.some_permission' => [
                'tab' => 'useractivator',
                'label' => 'Some permission'
            ],
        ];
    }

    /**
     * Registers back-end navigation items for this plugin.
     *
     * @return array
     */
    public function registerNavigation()
    {
        return []; // Remove this line to activate

        return [
            'useractivator' => [
                'label'       => 'useractivator',
                'url'         => Backend::url('atom/useractivator/mycontroller'),
                'icon'        => 'icon-leaf',
                'permissions' => ['atom.useractivator.*'],
                'order'       => 500,
            ],
        ];
    }

    public function registerMailTemplates()
    {
        return [
            'activation' => 'atom.useractivator::mail.activation',
        ];
    }
}
