require('./bootstrap');
import Vue from 'vue';
import { createApp } from 'vue';
window.Vue = require('vue');

// import NotificationsComponent from './components/NotificationsComponent.vue';

  const app =
      createApp({

          data() {
              return {
              }
          }
      });

app.component('NotificationsComponent', require('./components/NotificationsComponent.vue').default)
app.mount('#notifications');


