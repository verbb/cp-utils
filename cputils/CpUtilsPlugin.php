<?php
namespace Craft;

class CpUtilsPlugin extends BasePlugin
{
    // =========================================================================
    // PLUGIN INFO
    // =========================================================================
    
    public function getName()
    {
        return 'Control Panel Utilities';
    }

    public function getVersion()
    {
        return '0.1.0';
    }

    public function getDeveloper()
    {
        return 'Verbb';
    }

    public function getDeveloperUrl()
    {
        return 'https://verbb.io';
    }

    public function init()
    {
        // A very simple way to shut down an install effectively through config environement
        // variables. No need for another plugin! add `'isOffline' => true` to config/general.php
        if (craft()->config->get('isOffline')) {
            craft()->end();
        }
    }

    public function defineAdditionalAssetTableAttributes()
    {
        // Provide a native 'Link' column for assets. All other elements seem to get this
        return ['link' => array('label' => Craft::t('Link'), 'icon' => 'world')];
    }

    public function getAssetTableAttributeHtml(AssetFileModel $asset, $attribute)
    {
        // Provide a native 'Link' column for assets. All other elements seem to get this
        if ($attribute == 'link') {
            return '<a href="' . $asset->url . '" target="_blank" data-icon="world" title="'.Craft::t('View asset').'"></a>';
        }
    }
}

