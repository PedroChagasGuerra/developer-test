var config = {
    config: {
        mixins: {
            'Magento_Checkout/js/action/set-shipping-information': {
                'PedroGuerra_DeveloperTest/js/action/set-shipping-information-mixin': true
            }
        }
    },

    paths: {
        'flexslider': 'PedroGuerra_DeveloperTest/js/lib/jquery.flexslider-min',
    },

    shim: {
        'flexslider': {
            deps: ['jquery'],

        }
    }

};