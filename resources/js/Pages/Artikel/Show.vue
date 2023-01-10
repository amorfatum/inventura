<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/inertia-vue3';
import { useForm } from '@inertiajs/inertia-vue3'

const form = useForm({
    artikelId: '',
});

defineProps({
    artikel: Array,
});

const submit = () => {
    form.post(route('artikel.show'));
};

</script>

<template>
    <Head title="Index" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Artikels</h2>
        </template>

        <div>
            <form action="" style="background-color: lightblue; width: 50%; height: 100px; padding: 30px;" @submit.prevent="form.post(route('artikel.show'))">
                <input v-model="form.artikelId" type="search" name="artikelId" id="artikelId">
                <button type="submit" class="" style="background-color: white; width: 100px; padding: 5px; margin: 2px 15px 2px 15px">Scan</button>
            </form>
        </div>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6" v-for="art in artikel">
                <table>
                    <tr>
                        <th>ID</th>
                        <th>Liferanten ID</th>
                        <th>Name</th>
                        <th>Stück</th>
                        <th>Preis</th>
                    </tr>
                    <tr>
                        <td>{{art.id}}</td>
                        <td>{{art.lieferantenId}}</td>
                        <td>{{art.artikelName}}</td>
                        <td>{{art.anzahl}}</td>
                        <td>{{art.preis}}</td>
                    </tr>
                </table>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
