"use client"

import {motion, Variants} from "motion/react"
import {CSSProperties} from "react";

const draw: Variants = {
    hidden: {pathLength: 0, opacity: 0},
    visible: (i: number) => {
        const delay = i * 0.5
        return {
            pathLength: 1,
            opacity: 1,
            transition: {
                pathLength: {delay, type: "spring", duration: 1.5, bounce: 0},
                opacity: {delay, duration: 0.01},
            },
        }
    },
}

const shape: CSSProperties = {
    strokeWidth: 10,
    strokeLinecap: "round",
    fill: "transparent",
}


const LaravelPath = () => {
    return (
        <motion.svg
            viewBox="0 0 584 600"
            initial="hidden"
            animate="visible"
            className="text-laravel-red p-2 w-full h-full md:w-[584px] md:h-[600px] max-w-full max-h-full"
        >
            {/* top rect left-top */}
            <motion.line
                x1="13"
                y1="74"
                x2="118"
                y2="9"
                stroke="currentColor"
                variants={draw}
                custom={1}
                style={shape}
            />
            {/* top rect top-right */}
            <motion.line
                x1="118"
                y1="9"
                x2="225"
                y2="75"
                stroke="currentColor"
                variants={draw}
                custom={2}
                style={shape}
            />
            {/* top rect right-bottom */}
            <motion.line
                x1="225"
                y1="75"
                x2="121"
                y2="137"
                stroke="currentColor"
                variants={draw}
                custom={1}
                style={shape}
            />
            {/* top rect bottom-left */}
            <motion.line
                x1="121"
                y1="137"
                x2="13"
                y2="74"
                stroke="currentColor"
                variants={draw}
                custom={2}
                style={shape}
            />
            {/*first line*/}
            <motion.line
                x1="13"
                y1="74"
                x2="13"
                y2="465"
                stroke="currentColor"
                variants={draw}
                custom={3}
                style={shape}
            />
            {/*second line*/}
            <motion.line
                x1="121"
                y1="137"
                x2="121"
                y2="397"
                stroke="currentColor"
                variants={draw}
                custom={3}
                style={shape}
            />
            {/*third line*/}
            <motion.line
                x1="225"
                y1="75"
                x2="225"
                y2="335"
                stroke="currentColor"
                variants={draw}
                custom={3}
                style={shape}
            />
            {/* second rect left-top */}
            <motion.line
                x1="351"
                y1="139"
                x2="460"
                y2="76"
                stroke="currentColor"
                variants={draw}
                custom={1}
                style={shape}
            />
            {/* second rect top-right */}
            <motion.line
                x1="460"
                y1="76"
                x2="570"
                y2="139"
                stroke="currentColor"
                variants={draw}
                custom={2}
                style={shape}
            />
            {/* second rect right-bottom */}
            <motion.line
                x1="570"
                y1="139"
                x2="461"
                y2="202"
                stroke="currentColor"
                variants={draw}
                custom={1}
                style={shape}
            />
            {/* second rect bottom-left */}
            <motion.line
                x1="461"
                y1="202"
                x2="351"
                y2="139"
                stroke="currentColor"
                variants={draw}
                custom={2}
                style={shape}
            />
            {/* fourth line*/}
            <motion.line
                x1="351"
                y1="139"
                x2="351"
                y2="268"
                stroke="currentColor"
                variants={draw}
                custom={3}
                style={shape}
            />
            {/* fifth line*/}
            <motion.line
                x1="461"
                y1="202"
                x2="461"
                y2="468"
                stroke="currentColor"
                variants={draw}
                custom={3}
                style={shape}
            />
            {/* sixth line*/}
            <motion.line
                x1="570"
                y1="139"
                x2="570"
                y2="268"
                stroke="currentColor"
                variants={draw}
                custom={3}
                style={shape}
            />
            {/* fifth-fourth connectors */}
            <motion.line
                x1="461"
                y1="329"
                x2="351"
                y2="268"
                stroke="currentColor"
                variants={draw}
                custom={4}
                style={shape}
            />
            {/* fifth-sixth connectors */}
            <motion.line
                x1="461"
                y1="329"
                x2="570"
                y2="268"
                stroke="currentColor"
                variants={draw}
                custom={4}
                style={shape}
            />
            {/* L bottom-top */}
            <motion.line
                x1="121"
                y1="397"
                x2="225"
                y2="465"
                stroke="currentColor"
                variants={draw}
                custom={4}
                style={shape}
            />
            {/* L bottom-bottom */}
            <motion.line
                x1="13"
                y1="465"
                x2="225"
                y2="594"
                stroke="currentColor"
                variants={draw}
                custom={4}
                style={shape}
            />
            {/* L bottom-right */}
            <motion.line
                x1="225"
                y1="465"
                x2="225"
                y2="594"
                stroke="currentColor"
                variants={draw}
                custom={5}
                style={shape}
            />
            {/* Connecting rect left-top */}
            <motion.line
                x1="121"
                y1="397"
                x2="351"
                y2="268"
                stroke="currentColor"
                variants={draw}
                custom={4}
                style={shape}
            />
            {/* Connecting rect right-bottom */}
            <motion.line
                x1="461"
                y1="329"
                x2="225"
                y2="465"
                stroke="currentColor"
                variants={draw}
                custom={4}
                style={shape}
            />
            {/* Connecting rect bottom bottom-left */}
            <motion.line
                x1="461"
                y1="468"
                x2="225"
                y2="594"
                stroke="currentColor"
                variants={draw}
                custom={4}
                style={shape}
            />
        </motion.svg>
    )
}

export default LaravelPath;
