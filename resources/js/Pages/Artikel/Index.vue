<script setup>
import { ref } from "vue";
import { watch } from "vue";
import { Inertia } from "@inertiajs/inertia";
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/inertia-vue3';

const props = defineProps({
    artikel:{
        type: Object,
        default: () => ({}),
    },
});

let search = ref(props.artikel);

watch(search, (value) => {
  Inertia.get(
    "/artikel",
    { search: value },
    {
      preserveState: true,
      replace: true,
    }
  );
}); 

</script>

<template>
    <Head title="Index" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Artikels</h2>
        </template>

        <div>
            <div class="mb-2">
                <input
                    type="text"
                    v-model="search"
                    placeholder="Search..."
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-60 p-2.5"
                />
            </div>
            <button type="submit" class="" style="background-color: white; width: 100px; padding: 5px; margin: 2px 15px 2px 15px">Scan</button>
        </div>
        <div class="py-12">
                <table>
                    <tr>
                        <th>ID</th>
                        <th>Liferanten ID</th>
                        <th>Name</th>
                        <th>Stück</th>
                        <th>Preis</th>
                    </tr>
                    <tr v-for="artikel in artikel.data">
                        <td>{{artikel.id}}</td>
                        <td>{{artikel.lieferantenId}}</td>
                        <td>{{artikel.artikelName}}</td>
                        <td>{{artikel.anzahl}}</td>
                        <td>{{artikel.preis}}</td>
                    </tr>
                </table>
        </div>
    </AuthenticatedLayout>
</template>
