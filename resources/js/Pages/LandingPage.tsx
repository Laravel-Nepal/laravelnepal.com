import HeroSection from "@/Components/Sections/HeroSection";
import FrontWrapper from "@/Wrappers/FrontWrapper";
import { ReactNode } from "react";

const LandingPage = () => {
    return (
        <>
            <HeroSection />
            <div className="grid grid-cols-1 lg:grid-cols-2 gap-8 mt-12 pb-24">
            </div>
        </>
    );
};

LandingPage.layout = (page: ReactNode) => <FrontWrapper title={undefined}>{page}</FrontWrapper>;

export default LandingPage;
