// Are we running the minimum version?
        if (version_compare(PHP_VERSION, $this->minimumPHPVersion, 'lt')) {
            return new Response('Your server does not meet the minimum PHP requirements. BDMSites requires PHP version '.$this->minimumPHPVersion.' while your server has '.PHP_VERSION.'. Please contact your host to update your PHP installation.', 500);
        }

        // Are we running a version newer than what Mautic supports?
        if (version_compare(PHP_VERSION, $this->maximumPHPVersion, 'gt')) {
            return new Response('BDMSites does not support PHP version '.PHP_VERSION.' at this time. To use Mautic, you will need to downgrade to an earlier version.', 500);
        }
