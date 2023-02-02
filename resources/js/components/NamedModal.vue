<template>
    <modal :name="myName">
        <div style="color: #6f42c1">
            <p>Name: {{myName}}</p>
            <p>ID: {{id}}</p>
            <p>Child Name: {{childName}}</p>
            <p>Child ID: {{childID}}</p>
        </div>
        <template v-slot:child>
            <named-modal :id="childID"></named-modal>
        </template>
    </modal>
</template>

<script>
import Modal from "./Modal"

export default {
    name: "NamedModal",
    components: { Modal, NamedModal: () => import("./NamedModal") },
    props: { id: { type: Number, required: true } },
    data: () => ({
        childID: Math.floor(Math.random() * 10000)
    }),
    computed: {
        myName() {
            return `named-${this.id}`
        },
        childName() {
            return `named-${this.childID}`
        }
    },
}
</script>
