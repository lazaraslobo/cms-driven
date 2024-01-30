<template>
    <div class="child-container">
        <div class="col-12 inputs-container">
            <div class="d-flex my-3 justify-content-between">
                <span>ID: {{data.id}}</span>
                <router-link :to="clientRoutes.page(data.slug)">Open Page</router-link>
                <router-link :to="adminRoutes.create_sub_cms_page(data.id)">Add sub page</router-link>
                <i class="bi bi-trash3-fill" role="button" @click="deletePageById(data.id)"></i>
            </div>
            <div class="d-flex my-3 justify-content-between">
                TITLE: <input type="text" v-model="data.title" />
            </div>
            <div class="d-flex my-3 justify-content-between">
                CONTENT: <input type="text" v-model="data.content" />
            </div>
            <div class="d-flex my-3 justify-content-between">
                SLUG: <input type="text" v-model="data.slug" />
            </div>
            <div class="d-flex my-3 justify-content-end">
                <button @click="savePageData()">SAVE</button>
            </div>
        </div>
        <div class="col-12 inner">
            <child-pages
                v-for="(eachChild, index) in data.children"
                :data="eachChild" :key="index">
            </child-pages>
        </div>
    </div>
</template>

<script lang="ts">
import {defineComponent, PropType} from "vue";
import './styles.scss';
import axios from "axios";
import {adminApis} from "../../../api/api-maps";
import {adminRoutes, clientRoutes} from "../../../routes/paths";
import {useRouter} from "vue-router";

type propDataType = {
    id: number;
    title: string;
    content: string;
    "parent_id": any,
    "slug": string,
    "created_at": any,
    "updated_at": any,
    children: propDataType[];
}

export default defineComponent({
    name: "ChildPages",
    setup(){
        const router = useRouter();
        return {
            router
        }
    },
    props: {
        data: {
            type:  Object as PropType<propDataType>
        },
        reloadCallback: {
            type: Function as PropType<() => void>,
            default: () => null
        }
    },
    data(){
        return {
            adminRoutes,
            clientRoutes
        }
    },
    methods: {
        savePageData(){
            const {title,content,slug,id,parent_id} = this.data;
            axios.post(adminApis.updateOrCreatePageData, { title, content, slug, parent_id, id})
            .then(({data}) => {
                this.reloadCallback();
                console.log("resp ", data);
            })
        },
        deletePageById(id: string|number){
            axios.delete(adminApis.removePageById(id))
                .then(({data}) => {
                    this.reloadCallback();
                })
        }
    }
})
</script>
