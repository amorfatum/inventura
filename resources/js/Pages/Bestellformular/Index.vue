<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/inertia-vue3';
import { useForm } from '@inertiajs/inertia-vue3';
import TextInput from '@/Components/TextInput.vue';
import InputLabel from '@/Components/InputLabel.vue';

const form = useForm({
    artikelId: '',
    lieferantenId: '',
    anzahl: '',
});

defineProps({
    bestellform: Array,
});

const submit = () => {
    form.post(route('bestellformular.store'), {
        onFinish: () => form.reset(),
    });
};

</script>

<template>
    <Head title="Index" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Bestellformular</h2>
        </template>

        <div>
            <form action="" style="background-color: lightblue; max-width: 20%; height: 300px; padding: 30px; margin: 1% 25% 0 25%" @submit.prevent="submit">
                <InputLabel for="artikelId" value="Artikel ID: " />
                <TextInput type="text" v-model="form.artikelId" name="artikelId" id="artikelId" class="mt-1 block w-full" />
                <InputLabel for="lieferantenId" value="Lieferanten ID" />
                <TextInput type="text" v-model="form.lieferantenId" name="lieferantenId" id="lieferantenId" class="mt-1 block w-full"/>
                <InputLabel for="anzahl" value="Anzahl: " />
                <TextInput type="text" v-model="form.anzahl" name="anzahl" id="anzahl" />
                <button type="submit" class="" style="background-color: white; width: 100px; padding: 5px; margin: 2px 15px 2px 15px">Speichern</button>
            </form>
        </div>
        
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6" v-for="bf in bestellform">
                <table>
                    <tr>
                        <th>Artikel ID</th>
                        <th>Lieferanten ID</th>
                        <th>Anzahl</th>
                    </tr>
                    <tr>
                        <td>{{bf.artikelId}}</td>
                        <td>{{bf.lieferantenId}}</td>
                        <td>{{bf.anzahl}}</td>
                    </tr>
                </table>
            </div>
        </div>
    </AuthenticatedLayout>
    
</template>
