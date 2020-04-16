<template>
    <button @click="onClick" class="btn" :class="{
        'btn-primary': styleType === 'primary' && !isOutline,
        'btn-secondary': styleType === 'secondary' && !isOutline,
        'btn-success': styleType === 'success' && !isOutline,
        'btn-danger': styleType === 'danger' && !isOutline,
        'btn-warning': styleType === 'warning' && !isOutline,
        'btn-info': styleType === 'info' && !isOutline,
        'btn-outline-primary': styleType === 'primary' && isOutline,
        'btn-outline-secondary': styleType === 'secondary' && isOutline,
        'btn-outline-success': styleType === 'success' && isOutline,
        'btn-outline-danger': styleType === 'danger' && isOutline,
        'btn-outline-warning': styleType === 'warning' && isOutline,
        'btn-outline-info': styleType === 'info' && isOutline,
        'btn-block': isBlock,
    }" :type="type" :disabled="!enabled">
        <slot>Button</slot>
    </button>
</template>

<script>
    export default {
        name: "AppButton",
        props: {
            isPrimary: Boolean,
            isBlock: Boolean,
            isOutline: Boolean,
            styleType: String,
            type: {
                type: String,
                default: 'button',
            },
            onClick: {
                type: Function,
                required: true,
            },
            enabled: {
                type: Boolean,
                default: true,
            },
        },
    }
</script>

<style scoped>

</style>
