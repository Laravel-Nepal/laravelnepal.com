import AboutUsSection from "@/Components/Sections/AboutUsSection";
import HeroSection from "@/Components/Sections/HeroSection";
import FrontWrapper from "@/Wrappers/FrontWrapper";
import { ReactNode } from "react";

const LandingPage = () => {
    return (
        <>
            <HeroSection />
            <AboutUsSection />
        </>
    );
};

LandingPage.layout = (page: ReactNode) => <FrontWrapper title={undefined}>{page}</FrontWrapper>;

export default LandingPage;
