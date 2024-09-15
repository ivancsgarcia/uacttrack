import './bootstrap';
import Account from '../js/components/global/Account.vue';
import SearchBar from '../js/components/global/SearchBar.vue';
import SideMenu from './components/global/SideMenu.vue';
import UAHeader from '../js/components/global/UAheader.vue';

/* import the fontawesome core */
import { library } from '@fortawesome/fontawesome-svg-core';
/* import font awesome icon component */
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';
/* import specific icons */
import { fas } from '@fortawesome/free-solid-svg-icons';
/* add icons to the library */
library.add(fas);

import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/vue3';
import { ZiggyVue } from '../../vendor/tightenco/ziggy';
import PrimeVue from 'primevue/config';
import { PrimeIcons } from '@primevue/core/api';
import { setThemeOnLoad } from './theme';
import Aura from '@primevue/themes/aura';

createInertiaApp({
  resolve: name => {
    const pages = import.meta.glob('./Pages/**/*.vue', { eager: true })
    return pages[`./Pages/${name}.vue`]
  },
  setup({ el, App, props, plugin }) {
    createApp({ render: () => h(App, props) })
      .use(plugin)
      .use(ZiggyVue)
      // .use(PrimeVue, {
        // unstyled: true,
        // theme: {
            // preset: Aura,
            // options: {
            //   cssLayer: {
            //     name: 'primevue',
            //     order: 'tailwind-base, primevue, tailwind-utilities'
            //   }
            // }
        // }
      // })
      // .use(PrimeIcons)
      .component('font-awesome-icon', FontAwesomeIcon)
      .component('Account', Account)
      .component('SearchBar', SearchBar)
      .component('SideMenu', SideMenu)
      .component('UAHeader', UAHeader)
      .mount(el)
  },
})

setThemeOnLoad();