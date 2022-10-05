<?php namespace Atom\Students;

use Backend;
use System\Classes\PluginBase;
use Event;
use Atom\Students\Classes\Extend\UserExtend;

/**
 * Students Plugin Information File
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
            'name'        => 'Students',
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
        now()->setTimezone('Europe/Bratislava');
        date_default_timezone_set('Europe/Bratislava');

        UserExtend::extendUser_AddArrivals();
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
            'Atom\Students\Components\MyComponent' => 'myComponent',
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
            'atom.students.some_permission' => [
                'tab' => 'Students',
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

        return [
            'students' => [
                'label'       => 'Students',
                'url'         => Backend::url('atom/students/students'),
                'icon'        => 'icon-leaf',
                'permissions' => ['atom.students.*'],
                'order'       => 500,
            ],
        ];
    }
}
