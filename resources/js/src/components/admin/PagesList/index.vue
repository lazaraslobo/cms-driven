<template>
    <div class="pages-list-container container">
        <div class="d-flex flex-wrap">
            <span class="title col-12">CMS Page list</span>

            <div class="col-3 left-container">
                <div :class="['d-flex flex-wrap justify-content-between each-item', activeTab === index && 'active']" v-for="(eachItem, index) in cmsList.list" :key="index" role="button" @click="activeTab = index">
                    <span class="item col-12">{{eachItem.title}}</span>
                    <span class="sub-item col-12 mt-2">Slug: {{eachItem.slug}}</span>
                </div>
                <div class="d-flex justify-content-center mt-5">
                    <router-link :to="adminRoutes.create_new_cms_page">Add new page?</router-link>
                </div>
            </div>
            <div class="col-9">
                <div class="col-12" v-if="cmsList.list[activeTab]">
                    <div class="col-12 d-flex">
                        <ChildPagesComp
                            :reload-callback="getPagesList"
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
import {useRoute, useRouter} from "vue-router";

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
            console.log("back");
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
                });
        }
    },
    mounted() {
        this.getPagesList();
    }
})
</script>
