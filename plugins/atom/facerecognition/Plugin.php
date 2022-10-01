<?php namespace Atom\FaceRecognition;

use Backend;
use System\Classes\PluginBase;
use Atom\FaceRecogniton\Classes\Extend\StudentExtend;

/**
 * faceRecognition Plugin Information File
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
            'name'        => 'faceRecognition',
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
        StudentExtend::afterSave();
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
            'Atom\FaceRecognition\Components\MyComponent' => 'myComponent',
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
            'atom.facerecognition.some_permission' => [
                'tab' => 'faceRecognition',
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
            'facerecognition' => [
                'label'       => 'faceRecognition',
                'url'         => Backend::url('atom/facerecognition/mycontroller'),
                'icon'        => 'icon-leaf',
                'permissions' => ['atom.facerecognition.*'],
                'order'       => 500,
            ],
        ];
    }
}
