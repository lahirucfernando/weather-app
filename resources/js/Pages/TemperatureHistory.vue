<template>
  <div class="bg-white">
    <h2 class="text-5xl font-bold leading-7 text-green-600 m-8">
      Login Temperatures
    </h2>
    <hr>
    <div class="flex">
        <div class="flex-1 text-right">
        <div class="inline-flex p-2"><button @click="listOrder('hottest')" class="bg-red-500 hover:bg-red-700 font-bold py-2 px-4">Hottest First</button></div>
        <div class="inline-flex p-2"><button @click="listOrder('date')" class="bg-indigo-500 hover:bg-indigo-700 font-bold py-2 px-4">Reset Order</button></div>
        </div>
    </div>
    <div class="grid grid-cols-2 gap-4 m-8 pt-5">
      <div >
          <h2 class="text-3xl font-black pb-3">{{list[0].city_name}}</h2>
          <div class="grid grid-flow-col auto-cols-max gap-4 p-2" v-for="(item,key) in list[0].list" :key="key">
              <div>{{item.created_at}}</div>
              <div>{{item.celsius}} &#8451;</div>
              <div>{{item.fahrenheit}} &#8457;</div>
          </div>
      </div>
      <div>
          <h2 class="text-3xl font-black pb-3">{{list[1].city_name}}</h2>
          <div class="grid grid-flow-col auto-cols-max gap-4 p-2" v-for="(item,key) in list[1].list" :key="key">
              <div>{{item.created_at}}</div>
              <div>{{item.celsius}} &#8451;</div>
              <div>{{item.fahrenheit}} &#8457;</div>
          </div>
      </div>
    </div>
  </div>
</template>

<script>
import { defineComponent } from "vue";

export default defineComponent({
  props: {
    list: Array,
  },
  methods: {
    listOrder(orderBy) {
      this.$inertia.get('/dashboard', {orderBy}, { replace: true, preserveState: true })
    },
  },
});
</script>
