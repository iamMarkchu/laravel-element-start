<template>
    <div id="ck-table-page">
        <div class="table-section">
            <el-table
                border
                stripe
                v-loading="loading"
                style="width: 100%"
                :data="tableData">
                <template v-for="colConfig in colData">
                    <slot v-if="colConfig.slot" :name="colConfig.slot"></slot>
                    <component
                        v-else-if="colConfig.component"
                        :is="colConfig.component"
                        :col-config="colConfig">
                    </component>
                    <el-table-column v-else v-bind="colConfig" :width="getWidth(colConfig.prop)"></el-table-column>
                </template>
            </el-table>
        </div>
        <div class="page-section">
            <el-pagination
                @size-change="handleSizeChange"
                @current-change="handleCurrentChange"
                :current-page="currentPage"
                :page-size="pageSize"
                layout="total, sizes, prev, pager, next, jumper"
                :total="total">
            </el-pagination>
        </div>
    </div>
</template>

<script>
    export default {
        name: "CkTablePage",
        props: ['fetchList', 'colData', 'query'],
        created() {
            this.fetchData()
        },
        data() {
            return {
                tableData: [],
                currentPage: 1,
                pageSize: 30,
                total: 0,
                loading: false,
            }
        },
        methods: {
            fetchData() {
                this.loading = true
                let query = Object.assign({page: this.currentPage, pageSize: this.pageSize}, this.query)
                this.fetchList(query)
                    .then((response) => {
                        this.tableData = response.data.result.data
                        this.currentPage = response.data.result.current_page
                        this.total = response.data.result.total
                        this.loading = false
                    })
            },
            handleSizeChange(val) {
                this.pageSize = val
                this.fetchData();
            },
            handleCurrentChange(val) {
                this.currentPage = val
                this.fetchData();
            },
            getWidth(col) {
                let width = 180
                if (col == 'id')
                    width = 50
                return width
            }
        }
    }
</script>

<style scoped>

</style>