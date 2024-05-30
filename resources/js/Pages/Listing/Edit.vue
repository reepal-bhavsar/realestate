<template>
    <form @submit.prevent="update">
        <div class="grid grid-cols-6 gap-4">
            <div class="col-span-2">
                <label class="label">Beds</label>
                <input class="input" v-model.number="form.beds" type="text" />
                <ErrorMessage v-if="form.errors.beds" :errorMsg="form.errors.beds" />
            </div>
            <div class="col-span-2">
                <label class="label">Baths</label>
                <input class="input" v-model.number="form.baths" type="text" />
                <ErrorMessage v-if="form.errors.baths" :errorMsg="form.errors.baths" />
            </div>
            <div class="col-span-2">
                <label class="label">Area</label>
                <input class="input" v-model.number="form.area" type="text" />
                <ErrorMessage v-if="form.errors.area" :errorMsg="form.errors.area" />
            </div>
            <div class="col-span-4">
                <label class="label">City</label>
                <input class="input" v-model="form.city" type="text" />
                <ErrorMessage v-if="form.errors.city" :errorMsg="form.errors.city" />
            </div>
            <div class="col-span-2">
                <label class="label">Post Code</label>
                <input class="input" v-model="form.code" type="text" />
                <ErrorMessage v-if="form.errors.code" :errorMsg="form.errors.code" />
            </div>
            <div class="col-span-4">
                <label class="label">Street</label>
                <input class="input" v-model="form.street" type="text" />
                <ErrorMessage v-if="form.errors.street" :errorMsg="form.errors.street" />
            </div>
            <div class="col-span-2">
                <label class="label">Street Nr</label>
                <input class="input" v-model.number="form.street_nr" type="text" />
                <ErrorMessage v-if="form.errors.street_nr" :errorMsg="form.errors.street_nr" />
            </div>
            <div class="col-span-6">
                <label class="label">Price</label>
                <input class="input" v-model.number="form.price" type="text" />
                <ErrorMessage v-if="form.errors.price" :errorMsg="form.errors.price" />
            </div>
            <div class="col-span-6">
                <button class="btn-primary" type="submit">Update</button>
            </div>
        </div>
    </form>
</template>

<script setup>
    import { useForm } from '@inertiajs/vue3'
    import ErrorMessage from '@/Components/UI/ErrorMessage.vue'

    const props = defineProps({
        listing: Object,
    })

    const form = useForm({
        beds: props.listing.beds,
        baths: props.listing.baths,
        area: props.listing.area,
        city: props.listing.city,
        street: props.listing.street,
        code: props.listing.code,
        street_nr: props.listing.street_nr,
        price: props.listing.price,
    })

    // const update = () => form.put(`/listing/${props.listing.id}`)
    const update = () => form.put(route('listing.update', {listing:props.listing.id}))
</script>