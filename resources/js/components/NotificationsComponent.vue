<template>

    <div class="scroll-y mh-325px my-2 px-4">
        <!--begin::Item-->
        <div class="d-flex flex-stack py-4">
            <!--begin::Section-->
            <div class="col-3 align-items-center me-2">
                <!--begin::Title-->
                <a href="javascript::void(0);" class="text-gray-800 fw-bold">{{ nameTranslation }}</a>
                <!--end::Title-->
            </div>
            <!--end::Section-->
            <!--begin::Section-->
            <div class="col-3 align-items-center me-2">
                <!--begin::Title-->
                <a href="javascript::void(0);" class="text-gray-800 text-hover-primary fw-bold">{{ phoneNumberTranslation }}</a>
                <!--end::Title-->
            </div>
            <!--end::Section-->
            <!--begin::Section-->
            <div class="col-2 align-items-center me-2">
                <!--begin::Title-->
                <a href="javascript::void(0);" class="text-gray-800 text-hover-primary fw-bold">{{ businessTypeTranslation }}</a>
                <!--end::Title-->
            </div>
            <!--end::Section-->
            <!--begin::Section-->
            <div class="col-3 align-items-center me-2">
                <!--begin::Title-->
                <a href="javascript::void(0);" class="text-gray-800 text-hover-primary fw-bold">{{ serviceTranslation }}</a>
                <!--end::Title-->
            </div>
            <!--end::Section-->
        </div>
        <!--end::Item-->
        <!--begin::Item-->
        <div class="d-flex flex-stack py-4" v-for="order of recent_orders">
            <!--begin::Section-->
            <div class="col-3 align-items-center me-2">
                <!--begin::Title-->
                <a href="#" class="text-gray-800 badge badge-light-success fw-semibold">{{ order.name }}</a>
                <!--end::Title-->
            </div>
            <!--end::Section-->
            <!--begin::Section-->
            <div class="col-3 align-items-center me-2">
                <!--begin::Title-->
                <a href="#" class="text-gray-800 text-hover-primary fw-semibold">{{ order.business_type }}</a>
                <!--end::Title-->
            </div>
            <!--end::Section-->
            <!--begin::Section-->
            <div class="col-2 align-items-center me-2">
                <!--begin::Title-->
                <a href="#" class="text-gray-800 text-hover-primary fw-semibold">{{ order.phone_number }}</a>
                <!--end::Title-->
            </div>
            <!--end::Section-->
            <!--begin::Section-->
            <div class="col-3 align-items-center me-2">
                <!--begin::Title-->
                <a href="#" class="text-gray-800 text-hover-primary fw-semibold">{{ order.service_title }}</a>
                <!--end::Title-->
            </div>
            <!--end::Section-->
        </div>
        <!--end::Item-->
    </div>
</template>


<script>
import Echo from 'laravel-echo'
export default {
    name: "NotificationsComponent",
    data(){
        return {
            recent_orders: [],
        }
    },
    props:[
        'nameTranslation',
        'phoneNumberTranslation',
        'businessTypeTranslation',
        'serviceTranslation',
    ],
    mounted() {
        window.Echo.channel('OrderNotificationsChannel').listen('OrderNotification', (event) => {
            this.recent_orders.push(
                {
                    id: event.recent_order.id,
                    name: event.recent_order.name,
                    business_type: event.recent_order.business_type,
                    phone_number: event.recent_order.phone_number,
                    service_title: event.recent_order.service_title,
                }
            );
        })
    }
}
</script>
