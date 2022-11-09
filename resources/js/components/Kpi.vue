<template>
    <div>

        <div class="card">
            <h1 class="card-title text-center pt-2">KPI {{ $t('kpi.dashboard') }}</h1>
            <div class="card-body d-flex justify-content-between" style="padding: 0 !important;">
                <div class="col-md-5">
                    <h4 class="pl-3">{{ $t('kpi.filterBy') }}:</h4>

                    <div class="form-group">
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="inputText" v-model="searchText"
                                   :placeholder="$t('kpi.searchTitleSub')" >
                        </div>
                    </div>
                    <div class="form-group d-flex">
                        <div class="col-sm-4">
                            <select class="form-control" id="selectPhase" v-model="picked">
                                <option value="" selected="selected" disabled>{{ $t('kpi.filterPhase') }}...</option>
                                <option value="1">1. {{ $t('kpi.capex')}}</option>
                                <option value="2">2. {{ $t('kpi.analysis')}}</option>
                                <option value="3">3. {{ $t('kpi.confirmation')}}</option>
                                <option value="4">4. {{ $t('kpi.specification')}}</option>
                                <option value="5">5. {{ $t('kpi.development')}}</option>
                                <option value="6">6. {{ $t('kpi.test')}}</option>
                                <option value="7">7. {{ $t('kpi.security')}}</option>
                                <option value="8">8. {{ $t('kpi.production')}}</option>
                                <option value="9">9. {{ $t('kpi.guaranteed')}}</option>
                            </select>
                        </div>

                        <div class="col-sm-4">
                            <select class="form-control" id="selectStatus" v-model="picked">
                                <option value="" selected="selected" disabled>{{ $t('kpi.filterStatus') }}...</option>
                                <option value="status-orange">{{ $t('kpi.inProgressLate') }}</option>
                                <option value="status-blue">{{ $t('kpi.interrupted') }}</option>
                                <option value="status-yellow">{{ $t('kpi.inProgress') }}</option>
                                <option value="status-green">{{ $t('kpi.completed') }}</option>
                                <option value="status-red">{{ $t('kpi.completedLate') }}</option>
                            </select>
                        </div>
                        <button class="btn btn-outline-primary" @click="clearInputs()">{{ $t('kpi.showAll') }}</button>
                    </div>
                </div>

                <div class="col-md-4">
                    <h4>{{ $t('kpi.sortBy') }}:</h4>
                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="filterRadio" value="sortPhase8"
                                   v-model="picked" style="transform: scale(1.3);">
                            <label class="form-check-label">
                                {{ $t('kpi.datePhase8') }}
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="filterRadio" value="sortPhase9"
                                   v-model="picked" style="transform: scale(1.3);">
                            <label class="form-check-label">
                                {{ $t('kpi.datePhase9') }}
                            </label>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <img :src="$t('kpi.legendUrl')" alt="legend" class="img-thumbnail mb-2" style="width: 17em;">
                </div>
            </div>
        </div>


        <div class="projects">

            <Project
                v-for="(item,index) in filteredData"
                :key="index"
                :project="item"
                :levels="levels"
            />

        </div>
    </div>

</template>

<script>
import Project from './Project';
let locale = window.locale;
export default {
    components: {
        Project
    },
    data() {
        return {
            searchText: '',
            picked: '',
            currentLevel: null,
            data: [],
            levels: this.$t('kpi.levelsArray'),
        }
    },

    methods: {
        getData() {
            axios.get('/data')
                .then(response => {
                    this.data = response.data;
                })
                .catch(error => {
                    console.log(error);
                })
        },
        clearInputs() {
            this.searchText = "";
            this.picked = "";
        },
        filteredLevels() {
            return this.data.filter((item) => {
                return item[0][2].includes(this.picked);
            })
        },
        filteredStatuses() {

            return this.data.filter((item) => {
                let phase = item[0][2];
                let dateNow = new Date().toISOString().slice(0, 10);
                let status = item[phase-1][3];

                if (this.picked === 'status-blue') {
                    if (status === '3') {
                        return item;
                    }
                } else if (this.picked === 'status-green') {
                    if (status === '2' && item[phase-1][4] > dateNow) {
                        return item;
                    }
                } else if (this.picked === 'status-red') {
                    if (status === '4') {
                        return item;
                    }
                } else if (this.picked === 'status-yellow') {
                    if (status === '1' && item[phase-1][4] > dateNow) {
                        return item;
                    }
                } else if (this.picked === 'status-orange') {
                    if (status === '1' && item[phase-1][4] < dateNow) {
                        return item;
                    }
                }
            })
        },
        sortByPhase8() {
            return [...this.data].sort((a, b) => {
                return new Date(a[7][4]) - new Date(b[7][4]);
            })
        },
        sortByPhase9() {
            return [...this.data].sort((a, b) => {
                return new Date(a[8][4]) - new Date(b[8][4]);
            })
        },

        searchResults(){
            return this.data.filter((item) => {
                return item[0][0].toLowerCase().includes(this.searchText.toLowerCase()) || item[0][7].toLowerCase().includes(this.searchText.toLowerCase());
            })
        },
    },

    created() {
        this.getData();
    },
    computed: {
        filteredData() {
            if(this.searchText){
                return this.searchResults()
            }
            if (this.picked == null || this.picked === '') {
                return this.data;
            } else if (this.picked.startsWith("status")) {
                return this.filteredStatuses()
            } else if (this.picked === 'sortPhase8') {
                return this.sortByPhase8()
            } else if (this.picked === 'sortPhase9') {
                return this.sortByPhase9()
            } else if (1 <= this.picked && this.picked <= 9) {
                return this.filteredLevels()
            } else {
                return this.data;
            }
        },
    }
}
</script>

<style scoped>

.projects {
    width: 100%;
    height: 100%;
    display: flex;
    flex-wrap: wrap;
    margin-right: 2em;
    justify-content: center;
}
</style>
