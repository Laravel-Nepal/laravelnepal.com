import FrontWrapper from "@/Wrappers/FrontWrapper";
import { ReactNode } from "react";

const LandingPage = () => {
    return (
        <>
            <div className="min-h-screen w-full flex items-center justify-center">
                <h2 className="bg-gradient-to-b from-neutral-200 to-neutral-500 bg-clip-text text-3xl lg:text-7xl font-bold text-transparent py-20">
                    Something is cooking
                </h2>
            </div>
        </>
    );
};

LandingPage.layout = (page: ReactNode) => <FrontWrapper title={undefined}>{page}</FrontWrapper>;

export default LandingPage;
