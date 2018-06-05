<template>
    <div id="user-index">
        <ck-table-page
            :col-data="colData"
            :fetch-list="fetchList">
        </ck-table-page>
    </div>
</template>

<script>
    import { fetchList } from '../../api/users'
    import CkTablePage from "../../components/CkTablePage"
    const colConfigs = [
        ['id', 'ID'],
        ['name', '名字'],
        ['email', '电子邮箱'],
    ]
    export default {
        name: "user-index",
        created() {
            this.colData = colConfigs.map((value) => {
                return { prop: value[0], label: value[1] }
            })
        },
        data() {
            return {
                fetchList: fetchList,
                colData: [],
            }
        },
        methods: {
            handleEdit(row) {
                this.$router.push('/user/edit/'+ row.id)
            }
        },
        components: {
            CkTablePage
        }
    }
</script>

<style scoped>

</style>