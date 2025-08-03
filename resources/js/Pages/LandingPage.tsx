import FrontWrapper from "@/Wrappers/FrontWrapper";
import { ReactNode } from "react";
import HeroSection from "@/Components/Sections/HeroSection";

const LandingPage = () => {
    return (
        <>
            <HeroSection />
        </>
    );
};

LandingPage.layout = (page: ReactNode) => <FrontWrapper title={undefined}>{page}</FrontWrapper>;

export default LandingPage;
