import { motion } from "motion/react";

const Footer = () => {
    return (
        <motion.footer
            className="container bg-transparent py-12 text-center text-xl lg:text-2xl text-neutral-500 dark:text-neutral-400"
            initial={{ opacity: 0 }}
            whileInView={{ opacity: 1 }}
            transition={{ duration: 0.5, delay: 0.2 }}
        >
            &copy; {new Date().getFullYear()} Laravel Nepal. All rights reserved.
        </motion.footer>
    );
};

export default Footer;
