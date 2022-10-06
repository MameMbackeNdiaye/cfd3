<template >
    <div>
        Progress
    </div>
</template>

<script>
export default{
    props:['invest', 'financements'],

    mounted(){
        console.log(this.invest,this.financements);
    }
}

</script>