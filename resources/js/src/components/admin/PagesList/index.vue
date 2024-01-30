<template>
    <div class="pages-list-container container">
        <div class="d-flex flex-wrap">
            <span class="title">CMS Page list</span>

            <div class="col-12">

            </div>
        </div>
    </div>
</template>

<script lang="ts">
import {defineComponent} from "vue";
import './styles.scss';
import axios from "axios";
import {adminApis} from "../../../api/api-maps";

export default defineComponent({
    name: "CmsPagesLists",
    components: {
    },
    data(){
        return {
            cmsList: {
                isGettingData: false,
                list: []
            }
        }
    },
    methods: {
        getPagesList(){
            this.cmsList.isGettingData = true;
            axios.get(adminApis.get_all_cms_pages_list)
                .then(({ data }) => {
                    if(data?.data){
                        this.cmsList.list = data?.data;
                    }
                    console.log("Response data:", data);
                })
                .finally(() => {
                    this.cmsList.isGettingData = false;
                    // This block will be executed regardless of success or failure
                });
        }
    },
    mounted() {
        this.getPagesList();
    }
})
</script>
