<template>
    <div>
        {{title}}
    </div>
</template>


<script>
import Echo from 'laravel-echo'
export default {
    name: "NotificationsComponent",
    data(){
        return {title: 'How To Install Vue 3 in Laravel 8 From Scratch'}
    },
    mounted() {
        window.Echo.channel('OrderNotificationsChannel').listen('OrderNotification', (event) => {
            console.log(event);
        })
    }
}
</script>
