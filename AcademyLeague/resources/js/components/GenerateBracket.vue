<template>
    <div class="col-lg-12 d-flex">
        <div v-for="i in this.cells" :key="i" class="col-lg-4 border">
            <span>Round {{ i }}</span>
            <div v-for="j in i" :key="j" class="">
                team {{ j }}
            </div>
        </div>
    </div>
</template>

<script>

export default {
    props:['bracketdata'],
    data: function () {
        return {
            cells: this.bracketdata.teams.length,
        }
    },
    methods: {
        fetchdata: function(){
            var newdata = this.cells;
            var temp = [];
            var counter = 0;
            for(let i = 0; i < this.bracketdata.rounds; i++)
            {
                for(let i = 0; i < newdata; i++)
                {
                    counter++;
                }
                temp.push(counter);
                counter = 0;
                newdata = Math.round(newdata/2)
            }
            this.cells = temp;
        }
    },
    mounted: function () {
        this.fetchdata();
        console.log(this.rounds);
    },
}

</script>