import HeroSection from "@/Components/Sections/HeroSection";
import FrontWrapper from "@/Wrappers/FrontWrapper";
import { ReactNode } from "react";
import Sidebar from "@/Components/Shared/Sidebar";
import { cn } from "@/Lib/Utils";

const LandingPage = () => {
    return (
        <>
            <HeroSection />
            <div className={cn(
                "flex flex-row",
                "justify-between",
                "items-start",
                "gap-8",
                "mt-12",
                "pb-24"
            )}>
                <Sidebar />
                <div className="flex flex-col gap-4 w-4/5">
                    {/*Content*/}
                </div>
            </div>
        </>
    );
};

LandingPage.layout = (page: ReactNode) => <FrontWrapper title={undefined}>{page}</FrontWrapper>;

export default LandingPage;
