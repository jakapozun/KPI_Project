<template>
    <div class="card singleProject">
        <h3 class="card-header text-center" @mouseover="titleIn()" @mouseout="titleOut()">{{ project[0][0] }}</h3>
        <div class="card-body">
            <div class=" border-bottom border-dark infoNotes" v-if="info">
                <div class="row">
                    <div class="col-md-12">
                        <p><strong>{{ $t('kpi.projectSubscriber') }}:</strong> {{ project[0][7] ? project[0][7] : $t('kpi.noData') }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <p><strong>{{ $t('kpi.roi') }}:</strong> {{ project[0][6] ? project[0][6] : $t('kpi.noData') }}</p>
                        <p><strong>{{ $t('kpi.guaranteed') }}:</strong> {{ project[8][5] ? project[8][5] : $t('kpi.noData') }}</p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>{{ $t('kpi.goLive') }}:</strong> {{ project[7][5] ? project[7][5] : $t('kpi.noData') }}</p>
                        <p><strong>{{ $t('kpi.bonus') }}:</strong> {{ project[0][8] ? project[0][8] : $t('kpi.noData') }}</p>
                    </div>
                </div>

            </div>
            <div class="border border-dark infoNotes" v-if="notes">
                <div class="col-md-12">
                    <h4>{{ $t('kpi.notes') }}: </h4>
                    <p>{{ project[0][9] }}</p>
                </div>
            </div>

            <div class="levels">
                <Level v-for="(level, index) in project"
                       :key="index"
                       :data="level"
                       :name="levels[index]"
                       :number="index+1"
                       :parentHovering="levelHovered === (index+1)"
                />

                <div class="meter">
                    <div class="bar">
                        <div class="progressBar"
                             :style=" { 'height': (project[0][2] * 10) + 12 + '%', 'background-color': statusColor }">
                            <div class="innerBar" v-if="checkForHat"></div>
                        </div>
                        <div class="innerHover" v-for="n in 9" :key="n" @mouseover="hoverIn(n)"
                             @mouseout="hoverOut()"></div>
                    </div>
                    <div class="circle">
                        <div class="progressCircle" :style=" { 'background-color': statusColor } "></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</template>

<script>
import Level from './Level';

export default {
    name: "Project",
    data() {
        return {
            info: true,
            notes: false,
            statusColors: {
                green: '#7ab460',
                blue: '#6ea8f0',
                yellow: '#f0e96e',
                red: '#f06e6e',
                orange: '#ff9933',
            },
            levelHovered: 0,
        }
    },
    components: {Level},
    props: ["project", "levels"],
    methods: {
        titleIn() {
            this.info = false
            this.notes = true
        },
        titleOut() {
            this.notes = false
            this.info = true
        },
        hoverIn(value) {
            this.levelHovered = value;
        },
        hoverOut() {
            this.levelHovered = null;
        },
    },
    computed: {
        currentStatus() {
            let dateNow = new Date().toISOString().slice(0, 10);
            let currentPhase = this.project[0][2];
            let status =  this.project[currentPhase-1][3];

            if(status === '3'){
                return 3; //status 3 - blue - prekinjano
            }
            else if(status === '2'){
                if(this.project[currentPhase-1][4] < dateNow){
                    return 4; //status 4 - red - zaključeno, zamuja
                }
                else{
                    return 2; //status 2 - green - zaključeno
                }
            }
            else if(status === '4'){
                return 4;
            }
            else if(status === '1'){
                if(this.project[currentPhase-1][4] < dateNow){
                    return 99; //status 99 - orange - v delu, zamuja
                }
                else{
                    return 1; // status 1 - yellow - v delu, v roku
                }
            }
            else{
                return 3;
            }
        },
        statusColor() {
            if (this.currentStatus === 3) {
                return this.statusColors.blue;
            } else if (this.currentStatus === 4) {
                return this.statusColors.red;
            } else if (this.currentStatus === 2) {
                return this.statusColors.green;
            } else if (this.currentStatus === 99) {
                return this.statusColors.orange;
            } else if (this.currentStatus === 1) {
                return this.statusColors.yellow;
            } else {
                return alert("something's wrong..");
            }
        },
        checkForHat(){
            if(this.project[0][2] === '9'){
                return true
            }
            else{
                return false
            }
        }

    },
}
</script>

<style scoped>

.infoNotes {
    max-height: 15em;
    overflow: hidden;
    text-overflow: ellipsis;
}

.singleProject {
    max-width: 30em;
    min-width: 30em;
    margin: 0.5em;
}

.innerHover {
    width: 100%;
    height: 1em;
    top: 0.8em;
    position: absolute;
    pointer-events: auto;
}

.innerHover:nth-child(2) {
    top: 16.8em;
}

.innerHover:nth-child(3) {
    top: 14.8em;
}

.innerHover:nth-child(4) {
    top: 12.8em;
}

.innerHover:nth-child(5) {
    top: 10.8em;
}

.innerHover:nth-child(6) {
    top: 8.8em;
}

.innerHover:nth-child(7) {
    top: 6.8em;
}

.innerHover:nth-child(8) {
    top: 4.8em;
}

.innerHover:nth-child(9) {
    top: 2.8em;
}

.innerBar {
    height: 1em;
    background-color: #f50c0cc4;
    border-radius: 25px 25px 0 0;
}

.levels {
    position: relative;
    display: flex;
    text-align: center;
    justify-content: center;
    align-content: center;
}

/* termometer */
.meter {
    position: relative;
    height: 28em;
    width: 6em;
}

.bar {
    z-index: 1;
    height: 20em;
    width: 2.5em;
    background-color: #ffffff;
    border-radius: 1em 1em 0 0;
    border-top: 0.2em solid #5A5959;
    border-right: 0.2em solid #5A5959;
    border-left: 0.2em solid #5A5959;
    position: relative;
    top: 2.4em;
    left: 50%;
    transform: translateX(-50%);
}

.circle {
    height: 6em;
    width: 6em;
    background-color: #ffffff;
    border: 0.2em solid grey;
    position: absolute;
    bottom: 0;
    border-radius: 50%;
}

.progressCircle {
    content: "";
    display: block;
    width: 3.5em;
    height: 3.5em;
    border-radius: 50%;
    background-color: #ff9933;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
}

.progressBar {
    content: "";
    display: block;
    height: 2em;
    min-height: 2em;
    max-height: 20em;
    width: 1.1em;
    position: absolute;
    left: 50%;
    bottom: -1em;
    transform: translateX(-50%);
    border-radius: 1em 1em 0 0;
    background-color: #ff9933;
    z-index: 1;
    pointer-events: none;
}

</style>
