<template>
    <div class="pages-list-container container">
        <div class="d-flex flex-wrap">
            <span class="title col-12">CMS Page list</span>

            <div class="col-3 left-container">
                <span :class="['d-flex', activeTab === index && 'active']" v-for="(eachItem, index) in cmsList.list" :key="index" role="button" @click="activeTab = index">
                    {{eachItem.title}}
                </span>
                <div class="d-flex justify-content-center mt-5">
                    <router-link :to="adminRoutes.create_new_cms_page">Add new page?</router-link>
                </div>
            </div>
            <div class="col-9">
                <div class="col-12" v-if="cmsList.list[activeTab]">
                    <div class="col-12 d-flex">
                        <ChildPagesComp
                            :data="cmsList.list[activeTab]"
                            :key="index"
                        />
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script lang="ts">
import {defineComponent} from "vue";
import './styles.scss';
import axios from "axios";
import {adminApis} from "../../../api/api-maps";
import ChildPagesComp from "./ChildPages.vue";
import {adminRoutes} from "../../../routes/paths";

export default defineComponent({
    name: "CmsPagesLists",
    components: {
        ChildPagesComp
    },
    data(){
        return {
            activeTab: 0,
            cmsList: {
                isGettingData: false,
                list: []
            },
            adminRoutes
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
