<template>
      <div class="container">
        <div>
          <div class="search"> <i class="fa fa-search"></i> 
          <input type="text" v-model="anagram" class="form-control" placeholder="Input anagram coma separated"> <button class="btn btn-primary" @click="findAnagram">Find</button> </div>
        </div>
        <ul class="list-group mt-2">
        <li class="list-group-item" v-for="(data, idx) in result" :key="idx">
            {{ data }}
        </li>
        </ul>
      </div>
</template>
<style>

.search {
    position: relative;
    box-shadow: 0 0 40px rgba(51, 51, 51, .1)
}

.search input {
    height: 60px;
    text-indent: 25px;
    border: 2px solid #d6d4d4
}

.search input:focus {
    box-shadow: none;
    border: 2px solid rgb(6, 6, 216)
}

.search .fa-search {
    position: absolute;
    top: 20px;
    left: 16px
}

.search button {
    position: absolute;
    top: 5px;
    right: 5px;
    height: 50px;
    width: 110px;
    background: blue
}
</style>
<script>
export default {
    data() {
        return {
            anagram: 'kita,atik,tika,makan,kua',
            result : [],
        }
    },
    methods: {
        findAnagram(){
            const anagram = this.anagram.split(',')

            let result = {}

            for (let i = 0; i < anagram.length; i++) {
                const element = anagram[i];
                const key = element.split('').sort().join('')

                if (result[key]) {
                    result[key].push(element)
                } else {
                    result[key] = [element]
                }
            }

            this.result = result
        }
    },
    mounted() {
        this.findAnagram()
    },
}
</script>