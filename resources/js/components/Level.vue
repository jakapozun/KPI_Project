<template>
    <div class="item">
        <div :class="{hovering: isHovering}" class="level" @mouseover="hoverIn()" @mouseout="hoverOut()">
            <span class="levelNumber">{{ levelText }}</span>
        </div>
        <div class="levelName">{{ name }}</div>
    </div>
</template>

<script>
export default {
    name: "Level",
    props: ["data", "name", "number", "parentHovering"],
    data() {
        return {
            innerHovering: false,
        }
    },
    computed:
        {
            isHovering() {
                return this.innerHovering || this.parentHovering;
            },

            levelText() {
                if (this.isHovering) {
                    let date = this.data[4];

                    if (!date) {
                        return "Ni datuma";
                    }
                    return date;
                }

                return this.number;
            }
        },
    methods: {
        hoverIn() {
            this.innerHovering = true;
        },
        hoverOut() {
            this.innerHovering = false;
        }
    }
}
</script>

<style scoped>

.item {
    width: 7em;
    position: absolute;
}

.item:nth-child(1) {
    left: 3em;
    bottom: 6em;
}

.item:nth-child(2) {
    right: 3em;
    bottom: 8em;
}

.item:nth-child(3) {
    left: 3em;
    bottom: 10em;
}

.item:nth-child(4) {
    right: 3em;
    bottom: 12em;
}

.item:nth-child(5) {
    left: 3em;
    bottom: 14em;
}

.item:nth-child(6) {
    right: 3em;
    bottom: 16em;
}

.item:nth-child(7) {
    left: 3em;
    bottom: 18em;
}

.item:nth-child(8) {
    right: 3em;
    bottom: 20em;
}

.item:nth-child(9) {
    left: 3em;
    bottom: 22em;
}

.level {
    font-size: 1.5em;
}

.level.hovering {
    font-size: 1em;
    background-color: #252525;
    color: #ffffff;
    border: 1px solid #c7cfb7;
    border-radius: 8px;
    margin-bottom: 2px;
}

.levelName {
    border-top: 0.1em solid darkgreen;
    font-style: italic;
}
</style>
